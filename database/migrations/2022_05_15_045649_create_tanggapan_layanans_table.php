<?php

use App\Models\Pegawai;
use App\Models\Layanan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Layanan::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Pegawai::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('status');
            $table->string('dokumen');
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
        Schema::dropIfExists('tanggapan_layanans');
    }
};
