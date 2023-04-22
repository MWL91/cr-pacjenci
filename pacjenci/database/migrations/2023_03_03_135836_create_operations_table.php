<?php

use App\helpers\migrationSchema\schemaOperations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('phone');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('patients_groups');
            $table->integer('priority');
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->text('extrainfo')->nullable();
            $table->string('operationsPerformed', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
