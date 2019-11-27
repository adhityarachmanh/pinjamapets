
<div class="column is-3">
    <aside class="is-medium menu">
  <p class="menu-label">
    Kategori
  </p>
  <ul class="menu-list">
    <?php
    use App\Kategori;
    $kategoris=Kategori::all();
    
    ?>
    @foreach ($kategoris as $kategori)
      <li><a href="#let" class="title is-6 is-capitalized"> {{$kategori->nama_kategori}}</a></li> 
    @endforeach
   
  </ul>
      <p class="menu-label">
        More to read...
      </p>
      <ul class="menu-list">
      
        <li><span class="tag is-white is-medium">Medium</span></li>
      </ul>
    </aside>
  </div>