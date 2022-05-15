<?php

use App\Models\Layanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Layanan::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode');
            $table->enum('keterangan', ['belum diproses', 'sedang diproses', 'diterima', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_layanans');
    }
};
