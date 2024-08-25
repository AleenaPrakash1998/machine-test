<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
                $table->id();
                $table->foreignId('estimate_id')->constrained('estimates');
                $table->decimal('invoice_amount', 10, 2);
                $table->date('due_date');
                $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
