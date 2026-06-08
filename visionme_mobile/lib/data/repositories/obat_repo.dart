import 'package:dio/dio.dart';
import '../../core/constants/api_constants.dart';
import '../../core/network/api_exception.dart';
import '../../core/network/dio_client.dart';
import '../models/obat_model.dart';

class ObatRepository {
  final DioClient _dioClient;

  ObatRepository(this._dioClient);

  Future<List<ObatModel>> getObats() async {
    try {
      final response = await _dioClient.dio.get(ApiConstants.obat);
      final List<dynamic> data = response.data;
      return data.map((json) => ObatModel.fromJson(json)).toList();
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }

  Future<ObatModel> getObatDetail(int id) async {
    try {
      final response = await _dioClient.dio.get('${ApiConstants.obat}/$id');
      return ObatModel.fromJson(response.data);
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }
}
