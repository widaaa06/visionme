class ArticleModel {
  final int id;
  final String title;
  final String category;
  final String readTime;
  final String author;
  final String date;
  final String summary;
  final String image;
  final String content;

  ArticleModel({
    required this.id,
    required this.title,
    required this.category,
    required this.readTime,
    required this.author,
    required this.date,
    required this.summary,
    required this.image,
    required this.content,
  });

  factory ArticleModel.fromJson(Map<String, dynamic> json) {
    return ArticleModel(
      id: json['id'],
      title: json['title'] ?? '',
      category: json['category'] ?? '',
      readTime: json['readTime'] ?? '',
      author: json['author'] ?? '',
      date: json['date'] ?? '',
      summary: json['summary'] ?? '',
      image: json['image'] ?? '',
      content: json['content'] ?? '',
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'title': title,
      'category': category,
      'readTime': readTime,
      'author': author,
      'date': date,
      'summary': summary,
      'image': image,
      'content': content,
    };
  }
}
