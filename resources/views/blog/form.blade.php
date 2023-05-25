<label for="title">Titre</label>
<input id="title" name="title" type="text" value="{{ old('title', $post->title) }}">
@error('title')
  {{ $message }}
@enderror
<label for="slug">Slug</label>
<input id="slug" name="slug" type="text" value="{{ old('slug', $post->slug) }}">
@error('slug')
  {{ $message }}
@enderror
<label for="content">Contenu</label>
<textarea id="content" name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
@error('content')
  {{ $message }}
@enderror
<button type="submit">Valider</button>
