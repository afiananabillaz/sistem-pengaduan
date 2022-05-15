<?php

use App\Models\Pegawai;
use App\Models\Pengaduan;
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
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pengaduan::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tanggapans');
    }
};
