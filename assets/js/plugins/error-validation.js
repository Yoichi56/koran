$('#validasi-pegawai-Form').bootstrapValidator({
  fields: {
    nik: {
      validators: {
        stringLength: {
          min: 16,
          max: 16,
          message: '<b class="text-danger">NIK tidak boleh lebih dari atau kurang dari 16 angka</b><br>'
        },
        notEmpty: {
          message: '<b class="text-danger">NIK tidak boleh kosong</b>'
        },
      }
    },
    nama_pegawai: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama pegawai tidak boleh kosong</b>'
        }
      }
    },
    alamat: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Alamat tidak boleh kosong</b>'
        }
      }
    },
    no_hp: {
      validators: {
        stringLength: {
          min: 12,
          max: 12,
          message: '<b class="text-danger">No HP tidak boleh lebih dari atau kurang dari 12 angka</b><br>'
        },
        notEmpty: {
          message: '<b class="text-danger">No HP tidak boleh kosong</b>'
        }
      }
    },
    tanggal_lahir: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tanggal lahir tidak boleh kosong</b>'
        }
      }
    },
    status: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Status tidak boleh kosong</b>'
        }
      }
    },
    mulai_kerja: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Pilih tanggal mulai kerja</b>'
        }
      }
    },
    kode_posisi: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Posisi tidak boleh kosong</b>'
        }
      }
    },
    kode_departemen: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Departemen tidak boleh kosong</b>'
        }
      }
    }
  }
});

$('#validasi-pegawai_gaji-Form').bootstrapValidator({
  fields: {
    gaji_pokok: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    },
    tunjangan_posisi: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    },
    tunjangan_kehadiran: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    },
    tunjangan_lembur: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    },
    tunjangan_lapangan: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    },
    tunjangan_bpjs: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Tidak boleh kosong</b>'
        },
      }
    }
  }
});

$('#validasi-departemen-Form').bootstrapValidator({
  fields: {
    nama_departemen: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama departemen tidak boleh kosong</b>'
        },
      }
    }
  }
});

$('#validasi-posisi-Form').bootstrapValidator({
  fields: {
    nama_posisi: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama posisi tidak boleh kosong</b>'
        },
      }
    }
  }
});

$('#validasi-proyek-Form').bootstrapValidator({
  fields: {
    nama_proyek: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama posisi tidak boleh kosong</b>'
        },
      }
    },
    alamat: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama posisi tidak boleh kosong</b>'
        },
      }
    },
    mulai: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama posisi tidak boleh kosong</b>'
        },
      }
    },
    no_kontrak: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama posisi tidak boleh kosong</b>'
        },
      }
    }
  }
});