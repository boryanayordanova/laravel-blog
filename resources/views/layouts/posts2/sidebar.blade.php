        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>


          <!-- show the archives -->

          <div class="sidebar-module">

            <h4>Archives</h4>

            <ol class="list-unstyled">

              @foreach (\App\Post2::archives() as $record)
                <li>
                  <a href="?month={{ $record['month'] }}&year={{ $record['year'] }}">
                      {{ $record['month']." ".$record['year'] }}
                  </a>
                </li>
              @endforeach

            </ol>

          </div>

          <!-- show tags -->
          <div class="sidebar-module">

            <h4>Tags</h4>

            <ol class="list-unstyled">

              @foreach (\App\Tag::has('posts')->pluck('name') as $t)

                <li>
                  <a href="/posts2/tags/{{ $t }}">
                      {{ $t }}
                  </a>
                </li>
              @endforeach

            </ol>

          </div>


          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->