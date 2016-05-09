@extends('template.app')
@section('content')
    
<style>
.feature-wrap i {
    font-size: 18px !important;
    height: 30px !important;
    width: 30px !important;
    margin: 3px;
    border-radius: 100%;
    line-height: 25px !important;
}
</style>

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Your Bookmark List</h2>                
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-12 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                          <table class="table table-hover">
                            <tbody><tr>
                              <th>No</th>
                              <th>Link</th>
                              <th>Create Date</th>
                              <th></th>
                            </tr>
                            <?php $rkey = 1; ?>
                            @foreach($types as $r)
                            <tr>
                              <td>{{ $rkey }}</td>
                              <td>{{ $r->link_url }}</td>                         
                              <td>{{ $r->created_at }}</td>        
                              <td>

                                @if (strpos($r->link_url, 'http') !== FALSE)                                
                                   <?php $rlink = $r->link_url; ?>
                                @else                                
                                    <?php $rlink = 'http://'.$r->link_url; ?>
                                @endif  

                                  <a href="{{ url($rlink) }}" class="edit_form_ico" data-toggle="tooltip" title="View" target="_new"><i class="fa fa-search"></i></a>
                                  <a href="{{ url('bookmark/delete', $r->id) }}" class="delete_form_ico" data-toggle="tooltip" title="Delete"><i class="fa fa-ban"></i></a>
                              </td>          
                            </tr>
                            <?php $rkey++;?>
                            @endforeach                                                      
                          </tbody>
                        </table>

                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->
    

@endsection