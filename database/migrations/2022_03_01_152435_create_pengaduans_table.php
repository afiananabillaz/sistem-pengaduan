<?php

use App\Models\Penyedia;
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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penyedia::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->string('bukti');
            $table->integer('disposisi');
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
        Schema::dropIfExists('pengaduans');
    }
};
