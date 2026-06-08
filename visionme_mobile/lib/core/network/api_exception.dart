import 'package:dio/dio.dart';

class ApiException implements Exception {
  final String message;
  final int? statusCode;

  ApiException(this.message, {this.statusCode});

  factory ApiException.fromDioError(DioException dioException) {
    String message = 'Terjadi kesalahan tidak dikenal.';
    int? statusCode = dioException.response?.statusCode;

    switch (dioException.type) {
      case DioExceptionType.connectionTimeout:
      case DioExceptionType.sendTimeout:
      case DioExceptionType.receiveTimeout:
        message = 'Koneksi ke server timeout. Silakan coba lagi.';
        break;
      case DioExceptionType.badResponse:
        final data = dioException.response?.data;
        if (data is Map && data.containsKey('message')) {
          message = data['message'].toString();
        } else if (statusCode == 401) {
          message = 'Email atau password salah, atau sesi Anda telah berakhir.';
        } else if (statusCode == 422) {
          if (data is Map && data.containsKey('errors')) {
            final errors = data['errors'];
            if (errors is Map) {
              final firstError = errors.values.first;
              if (firstError is List && firstError.isNotEmpty) {
                message = firstError.first.toString();
              } else {
                message = firstError.toString();
              }
            }
          } else {
            message = 'Validasi data gagal.';
          }
        } else {
          message = 'Server merespon dengan kesalahan: $statusCode';
        }
        break;
      case DioExceptionType.cancel:
        message = 'Permintaan ke server dibatalkan.';
        break;
      case DioExceptionType.connectionError:
        message = 'Tidak ada koneksi internet. Silakan periksa jaringan Anda.';
        break;
      default:
        message = 'Kesalahan jaringan atau server internal.';
        break;
    }
    return ApiException(message, statusCode: statusCode);
  }

  @override
  String toString() => message;
}
