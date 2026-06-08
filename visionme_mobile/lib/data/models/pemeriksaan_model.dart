class PemeriksaanModel {
  final int? id;
  final int? userId;
  final String kategoriUji;
  final String hasilPengukuran;
  final String statusMedis;
  final String? createdAt;

  PemeriksaanModel({
    this.id,
    this.userId,
    required this.kategoriUji,
    required this.hasilPengukuran,
    required this.statusMedis,
    this.createdAt,
  });

  factory PemeriksaanModel.fromJson(Map<String, dynamic> json) {
    return PemeriksaanModel(
      id: json['id'],
      userId: json['user_id'],
      kategoriUji: json['kategori_uji'] ?? '',
      hasilPengukuran: json['hasil_pengukuran'] ?? '',
      statusMedis: json['status_medis'] ?? '',
      createdAt: json['created_at'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      if (id != null) 'id': id,
      if (userId != null) 'user_id': userId,
      'kategori_uji': kategoriUji,
      'hasil_pengukuran': hasilPengukuran,
      'status_medis': statusMedis,
      if (createdAt != null) 'created_at': createdAt,
    };
  }
}
