@extends('layouts.app')
@section('title','HOME|PAGE')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--  <form name="create_post" id="contactForm" action="create" method="POST">-->



                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">

                                <textarea id="title" name="post_title" rows="1" class="form-control" placeholder=" PuT TiTlE HerE" id="post_title" required="" data-validation-required-message="Please enter a message." aria-invalid="false"></textarea>
                                <p class="help-block text-warning"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">

                                <textarea id="body" name="post_body" rows="5" class="form-control" placeholder="LeT's TeLl ....." id="post_body" required="" data-validation-required-message="Please enter a message." aria-invalid="false"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                             <input type="radio" name="options" id="option1" autocomplete="off"  value="2" checked> Short strory
                         </label>
                       <label class="btn btn-secondary">
                             <input type="radio" name="options" id="option2" autocomplete="off"  value="1" > novel
                           </label>
                       <label class="btn btn-secondary">
                      <input type="radio" name="options" id="option3" value="3" autocomplete="off"> comics
                        </label>
                       </div>
                      <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="b_post">PoSt</button>
                              <meta name="csrf-token" content="{{ csrf_token() }}">
                        </div>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                    </form>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="xxx">
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
  $("#b_post").click(function(){
    var title= $("#title").val();
    var body = $('#body').val();
    var cat = $('input[name="options"]:checked').val();
    $.ajax({
              url: 'fuck',
              type: "get",
              data: {title:title,body:body,cat:cat},
              success: function(data){
                 // What to do if we succeed
                 $(".xxx").load('<?php echo route('x'); ?>').fadeIn('fast');
                //   },10);
                console.log(data);





  }
          });
   });
   setInterval(posts,10000);
     function posts() {
     $(".xxx").load('<?php echo route('x'); ?>').fadeIn('fast');
   }

  });




</script>

@endsection
