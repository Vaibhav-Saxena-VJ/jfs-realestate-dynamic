<?php

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
        Schema::create('loan_remarks', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('loan_id'); // Foreign key for loans
            $table->unsignedBigInteger('agent_id'); // Foreign key for agents
            $table->string('status', 255); // Loan status
            $table->text('remarks'); // Remark details
            $table->timestamps(); // Created_at and Updated_at columns

            // Foreign key constraints
            $table->foreign('loan_id')->references('loan_id')->on('loans')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_remarks');
    }
};
