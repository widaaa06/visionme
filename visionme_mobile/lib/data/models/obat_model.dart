class ObatModel {
  final int id;
  final String nama;
  final String? deskripsi;
  final double harga;
  final int stok;
  final String? gambar;

  ObatModel({
    required this.id,
    required this.nama,
    this.deskripsi,
    required this.harga,
    required this.stok,
    this.gambar,
  });

  factory ObatModel.fromJson(Map<String, dynamic> json) {
    return ObatModel(
      id: json['id'],
      nama: json['nama'],
      deskripsi: json['deskripsi'],
      harga: double.tryParse(json['harga'].toString()) ?? 0.0,
      stok: int.tryParse(json['stok'].toString()) ?? 0,
      gambar: json['gambar'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'nama': nama,
      'deskripsi': deskripsi,
      'harga': harga,
      'stok': stok,
      'gambar': gambar,
    };
  }
}
