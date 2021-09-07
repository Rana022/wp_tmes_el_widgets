<form action="<?php echo home_url('/index.php/news/')?>" class="search-form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter" value="<?php echo get_search_query()?>" name="s">
                  <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                </div>
              </form>