<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('business_documents',function(Blueprint $table){$table->id();$table->foreignId('culinary_place_id')->unique()->constrained()->cascadeOnDelete();$table->string('nib_file');$table->string('ktp_file');$table->timestamp('uploaded_at')->useCurrent();});}public function down():void{Schema::dropIfExists('business_documents');}};
