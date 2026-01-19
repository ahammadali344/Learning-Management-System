Schema::create('courses', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description')->nullable();

    $table->foreignId('category_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('teacher_id')
          ->nullable()
          ->constrained('users')
          ->nullOnDelete();

    $table->enum('status', ['draft', 'published', 'archived'])
          ->default('draft');

    $table->timestamps();
});
