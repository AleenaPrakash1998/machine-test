<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('estimates', function (Blueprint $table) {
                $table->id();
                $table->foreignId('proposal_id')->constrained('proposals');
                $table->decimal('estimated_amount', 10, 2);
                $table->text('estimate_notes')->nullable();
                $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
