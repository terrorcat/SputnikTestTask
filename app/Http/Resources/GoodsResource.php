<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoodsResource extends JsonResource
{
    /**
     * Массив разных валют для преобразования
     * @var array
     */
    public static array $CURRENCIES = [
        'USD' => 90,
        'EUR' => 100,
        'RUR' => 1
    ];

    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function toArray(Request $request): array
    {
        $price = $this->price;
        $currency = $request->query('currency', 'RUR');
        $formattedPrice = $this->formatPrice($price, $currency);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $formattedPrice,
        ];
    }

    /**
     * Transform prices into given currency
     * @param $price
     * @param $currency
     * @return string
     * @throws \Exception
     */
    //todo: Вообще, по-правильному бы сделать отдельную сущность: курс валют. С таблицей и прочим.
    // Но задание характеризуется как "быстрое", потому я поступлюсь этой практикой в пользу хардкода
    public function formatPrice($price, $currency): string
    {
        if (!isset(self::$CURRENCIES[$currency])) {
            // Я использую дефолтный эксепшон ввиду простоты задания. Выключать вываливающиеся в контроллер "потроха" не хочу по той же причине
            throw new \Exception("Given currency '$currency' is not supported");
        }
        $rate = self::$CURRENCIES[$currency];
        $converted = $price / $rate;
        return match ($currency) {
            'USD' => '$' . number_format($converted, 2),
            'EUR' => '€' . number_format($converted, 2),
            'RUR' => number_format($converted, 0, '.', ' ') . ' ₽',
        };
    }
}
