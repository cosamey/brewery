<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('shipping.delivery_methods', [
            [
                'key' => 'pickup',
                'name' => 'Osobný odber',
                'description' => 'Ihneď',
                'fee' => 0,
                'allowedPaymentMethods' => ['card', 'transfer'],
                'position' => 1,
            ],
            [
                'key' => 'courier',
                'name' => 'Kuriér',
                'description' => '2 - 3 pracovné dni',
                'fee' => 5,
                'allowedPaymentMethods' => ['card', 'cod', 'transfer'],
                'position' => 2,
            ],
        ]);

        $this->migrator->add('shipping.payment_methods', [
            [
                'key' => 'card',
                'name' => 'Platobná karta',
                'description' => '',
                'icon' => 'credit-card',
                'fee' => 0,
                'position' => 1,
            ],
            [
                'key' => 'cod',
                'name' => 'Dobierka',
                'description' => '(+1 €)',
                'icon' => 'cash',
                'fee' => 1,
                'position' => 2,
            ],
            [
                'key' => 'transfer',
                'name' => 'Bankový prevod',
                'description' => '',
                'icon' => 'library',
                'fee' => 0,
                'position' => 3,
            ],
        ]);
    }
};
