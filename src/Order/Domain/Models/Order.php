<?php

declare(strict_types=1);

namespace Laracon\Order\Domain\Models;

use Laracon\Order\Infrastructure\Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laracon\Inventory\Contracts\DataTransferObjects\ProductDto;
use Laracon\Order\Domain\Exceptions\EmptyOrderException;

class Order extends Model
{
    use HasFactory;

    protected $orderLines = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return OrderFactory::new();
    }

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function addOrderLine(ProductDto $product, int $quantity): void
    {
        $orderLine = new OrderLine([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
        ]);

        $this->orderLines[] = $orderLine;
    }

    public function checkout(): void
    {
        if (empty($this->orderLines)) {
            throw new EmptyOrderException();
        }

        $this->amount = collect($this->orderLines)->sum(fn (OrderLine $orderLine) =>
            $orderLine->subtotal()
        );
        $this->tax = $this->amount * TaxRate::current()->rate;
        $this->total_amount = $this->amount + $this->tax;

        $this->save();
        $this->orderLines()->saveMany($this->orderLines);
        $this->refresh();
    }
}
