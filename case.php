<?php

// aggregate example with OPD and Pegawai classes
class OPD
{
  public array $pegawai;

  public function __construct(public string $name, public string $alamat)
  {
    $this->pegawai = [];
  }
}

class Pegawai
{
  public Jabatan $jabatan;

  public function __construct(public string $nama, array $jabatan)
  {
    $this->jabatan = new Jabatan($jabatan['nama'], $jabatan['kelas']);
  }
}

class Jabatan
{
  public function __construct(public string $nama, public string $kelas) {}
}

$kepalaBagian = [
  'nama' => 'Kepala Bagian',
  'kelas' => '10'
];

$arief = new Pegawai('Arief', $kepalaBagian);
$bpkad = new OPD("BPKAD", "Jl. Raya No. 1");
$bpkad->pegawai[] = $arief;
print_r($bpkad);
