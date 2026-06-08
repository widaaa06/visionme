import 'package:dio/dio.dart';
import '../../core/constants/api_constants.dart';
import '../../core/network/api_exception.dart';
import '../../core/network/dio_client.dart';
import '../models/user_model.dart';

class AuthRepository {
  final DioClient _dioClient;

  AuthRepository(this._dioClient);

  Future<Map<String, dynamic>> login(String email, String password) async {
    try {
      final response = await _dioClient.dio.post(
        ApiConstants.login,
        data: {
          'email': email,
          'password': password,
        },
      );
      
      final data = response.data;
      if (data['success'] == true) {
        return {
          'token': data['token'],
          'user': UserModel.fromJson(data['user']),
        };
      } else {
        throw ApiException(data['message'] ?? 'Login gagal.');
      }
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }

  Future<UserModel> register(String name, String email, String password) async {
    try {
      final response = await _dioClient.dio.post(
        ApiConstants.register,
        data: {
          'name': name,
          'email': email,
          'password': password,
        },
      );

      final data = response.data;
      if (data['success'] == true) {
        return UserModel.fromJson(data['user']);
      } else {
        throw ApiException(data['message'] ?? 'Registrasi gagal.');
      }
    } on DioException catch (e) {
      throw ApiException.fromDioError(e);
    }
  }

  Future<void> logout() async {
    try {
      await _dioClient.dio.post(ApiConstants.logout);
    } on DioException catch (e) {
      // Even if network logout fails, local state cleanup is performed
      throw ApiException.fromDioError(e);
    }
  }
}
