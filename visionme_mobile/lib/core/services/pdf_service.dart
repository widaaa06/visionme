import 'dart:typed_data';
import 'package:pdf/pdf.dart';
import 'package:pdf/widgets.dart' as pw;
import 'package:printing/printing.dart';

class PdfService {
  static Future<Uint8List> generateEyeReport({
    required String name,
    required String email,
    required String testCategory,
    required String measurementResult,
    required String medicalStatus,
    required String recommendation,
    required String date,
  }) async {
    final pdf = pw.Document();

    pdf.addPage(
      pw.Page(
        pageFormat: PdfPageFormat.a4,
        build: (pw.Context context) {
          return pw.Container(
            padding: const pw.EdgeInsets.all(30),
            child: pw.Column(
              crossAxisAlignment: pw.CrossAxisAlignment.start,
              children: [
                // Header
                pw.Row(
                  mainAxisAlignment: pw.MainAxisAlignment.between,
                  children: [
                    pw.Column(
                      crossAxisAlignment: pw.CrossAxisAlignment.start,
                      children: [
                        pw.Text(
                          'VisionMe',
                          style: pw.TextStyle(
                            fontSize: 24,
                            fontWeight: pw.FontWeight.bold,
                            color: PdfColors.blue,
                          ),
                        ),
                        pw.Text(
                          'Digital Eye Health Platform',
                          style: const pw.TextStyle(fontSize: 10, color: PdfColors.grey500),
                        ),
                      ],
                    ),
                    pw.Text(
                      'CLINICAL SCREENING REPORT',
                      style: pw.TextStyle(
                        fontSize: 12,
                        fontWeight: pw.FontWeight.bold,
                        color: PdfColors.grey700,
                      ),
                    ),
                  ],
                ),
                pw.Divider(thickness: 2, color: PdfColors.blue),
                pw.SizedBox(height: 20),

                // Patient Info
                pw.Text('Patient Details:', style: pw.TextStyle(fontWeight: pw.FontWeight.bold, fontSize: 12)),
                pw.SizedBox(height: 5),
                pw.Table(
                  border: pw.TableBorder.all(color: PdfColors.grey300, width: 0.5),
                  children: [
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text('Name')),
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text(name, style: pw.TextStyle(fontWeight: pw.FontWeight.bold))),
                      ],
                    ),
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text('Email')),
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text(email)),
                      ],
                    ),
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text('Date of Test')),
                        pw.Padding(padding: const pw.EdgeInsets.all(6), child: pw.Text(date)),
                      ],
                    ),
                  ],
                ),
                pw.SizedBox(height: 25),

                // Test Diagnostics
                pw.Text('Diagnostic Results:', style: pw.TextStyle(fontWeight: pw.FontWeight.bold, fontSize: 12)),
                pw.SizedBox(height: 5),
                pw.Table(
                  border: pw.TableBorder.all(color: PdfColors.grey300, width: 0.5),
                  children: [
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(8), child: pw.Text('Test Category', style: pw.TextStyle(fontWeight: pw.FontWeight.bold))),
                        pw.Padding(padding: const pw.EdgeInsets.all(8), child: pw.Text(testCategory)),
                      ],
                    ),
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(8), child: pw.Text('Measurement Output', style: pw.TextStyle(fontWeight: pw.FontWeight.bold))),
                        pw.Padding(padding: const pw.EdgeInsets.all(8), child: pw.Text(measurementResult)),
                      ],
                    ),
                    pw.TableRow(
                      children: [
                        pw.Padding(padding: const pw.EdgeInsets.all(8), child: pw.Text('Medical Status', style: pw.TextStyle(fontWeight: pw.FontWeight.bold))),
                        pw.Padding(
                          padding: const pw.EdgeInsets.all(8),
                          child: pw.Text(
                            medicalStatus,
                            style: pw.TextStyle(
                              fontWeight: pw.FontWeight.bold,
                              color: medicalStatus.toLowerCase() == 'normal' ? PdfColors.green : PdfColors.red,
                            ),
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
                pw.SizedBox(height: 25),

                // Recommendations
                pw.Container(
                  padding: const pw.EdgeInsets.all(12),
                  decoration: pw.BoxDecoration(
                    color: PdfColors.grey100,
                    borderRadius: const pw.BorderRadius.all(pw.Radius.circular(8)),
                    border: pw.Border.all(color: PdfColors.grey300, width: 1),
                  ),
                  child: pw.Column(
                    crossAxisAlignment: pw.CrossAxisAlignment.start,
                    children: [
                      pw.Text(
                        'MEDICAL RECOMMENDATIONS & GUIDANCE',
                        style: pw.TextStyle(
                          fontSize: 10,
                          fontWeight: pw.FontWeight.bold,
                          color: PdfColors.blue800,
                        ),
                      ),
                      pw.SizedBox(height: 5),
                      pw.Text(
                        recommendation,
                        style: const pw.TextStyle(fontSize: 10, color: PdfColors.black),
                      ),
                    ],
                  ),
                ),
                pw.Spacer(),

                // Disclaimer & Footer
                pw.Divider(color: PdfColors.grey300),
                pw.Text(
                  'Disclaimer: This digital screening is a preliminary evaluation based on visual interactive indicators. It is not an official medical prescription. For complete ocular diagnostic evaluation, please consult a licensed eye practitioner.',
                  style: const pw.TextStyle(fontSize: 8, color: PdfColors.grey500),
                ),
                pw.SizedBox(height: 10),
                pw.Row(
                  mainAxisAlignment: pw.MainAxisAlignment.between,
                  children: [
                    pw.Text('VisionMe Mobile App Reports', style: const pw.TextStyle(fontSize: 8, color: PdfColors.grey500)),
                    pw.Text('https://visionme.cicd.my.id', style: const pw.TextStyle(fontSize: 8, color: PdfColors.grey500)),
                  ],
                ),
              ],
            ),
          );
        },
      ),
    );

    return pdf.save();
  }

  static Future<void> exportAndPrintReport({
    required String name,
    required String email,
    required String testCategory,
    required String measurementResult,
    required String medicalStatus,
    required String recommendation,
    required String date,
  }) async {
    final pdfBytes = await generateEyeReport(
      name: name,
      email: email,
      testCategory: testCategory,
      measurementResult: measurementResult,
      medicalStatus: medicalStatus,
      recommendation: recommendation,
      date: date,
    );

    await Printing.layoutPdf(
      onLayout: (PdfPageFormat format) async => pdfBytes,
      name: '${testCategory.replaceAll(' ', '_')}_Report.pdf',
    );
  }
}
