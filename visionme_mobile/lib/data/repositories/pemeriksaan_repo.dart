import 'package:dio/dio.dart';
import '../../core/constants/api_constants.dart';
import '../../core/network/api_exception.dart';
import '../../core/network/dio_client.dart';
import '../models/pemeriksaan_model.dart';

class PemeriksaanRepository {
  final DioClient _dioClient;

  PemeriksaanRepository(this._dioClient);

  Future<PemeriksaanModel> storePemeriksaan({
    required String kategoriUji,
    required String hasilPengukuran,
    required String statusMedis,
  }) async {
    try {
      final response = await _dioClient.dio.post(
        ApiConstants.storePemeriksaan,
        data: {
          'kategori_uji': kategoriUji,
          'hasil_pengukuran': hasilPengukuran,
          'status_medis': statusMedis,
        },
      );

      final data = response.data;
      if (data['success'] == true) {
        return PemeriksaanModel.fromJson(data['data']);
      } else {
        throw ApiException(data['message'] ?? 'Gagal menyimpan pemeriksaan.');
      }
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }

  Future<List<PemeriksaanModel>> getRiwayatPemeriksaan() async {
    try {
      final response = await _dioClient.dio.get(ApiConstants.riwayatPemeriksaan);
      final Map<String, dynamic> body = response.data;
      if (body['status'] == 'success' || body['success'] == true) {
        final List<dynamic> list = body['data'];
        return list.map((json) => PemeriksaanModel.fromJson(json)).toList();
      } else {
        throw ApiException(body['message'] ?? 'Gagal mengambil riwayat.');
      }
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }
}
