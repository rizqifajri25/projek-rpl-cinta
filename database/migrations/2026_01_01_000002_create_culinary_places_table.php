<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('culinary_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('address');
            $table->string('district')->index();
            $table->string('city')->default('Palembang');
            $table->string('province')->default('Sumatera Selatan');
            $table->string('postal_code')->nullable();
            $table->decimal('latitude', 10, 7)->index();
            $table->decimal('longitude', 10, 7)->index();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->decimal('average_price', 12, 2)->default(0);
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->enum('halal_status', ['unknown', 'pending', 'verified', 'rejected'])->default('unknown')->index();
            $table->enum('verification_status', ['pending', 'approved', 'rejected'])->default('pending')->index();
            $table->boolean('featured')->default(false)->index();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->decimal('rating_average', 3, 2)->default(0)->index();
            $table->unsignedInteger('rating_total')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['latitude', 'longitude']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('culinary_places');
    }
};
