@extends('front.master')
@section('content')
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-4">
            <div class="contact-infoormation">
              <h5>
                Contact Info
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur ad ipis cing elit. Suspendisse at sapien mascsa. Lorem ipsum dolor sit amet, consectetur se adipiscing elit. Sed fermentum, sapien scele risque volutp at tempor, lacus est sodales massa, a hendrerit dolor slase turpis non mi.
              </p>
              <ul>
                <li>
                  <span class="icon">
                    <img src="front/images/message.png" alt="">
                  </span>
                  <p>
                    contact@michaeldesign.me
                    <br>
                    support@michaeldesign.me
                  </p>
                </li>
                <li>
                  <span class="icon">
                    <img src="front/images/phone.png" alt="">
                  </span>
                  <p>
                    084. 93 668 2236
                    <br>
                    084. 93 668 6789
                  </p>
                </li>
                <li>
                  <span class="icon">
                    <img src="front/images/address.png" alt="">
                  </span>
                  <p>
                    No.86 ChuaBoc St, DongDa Dt,
                    <br>
                    Hanoi, Vietnam
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div class="ContactForm">
              <h5>
                Contact Form
              </h5>
              <form method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
                  <div class="col-md-6">
                    <label>
                      Your Name
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input class="inputfild" type="text" name="name">
                  </div>
                  <div class="col-md-6">
                    <label>
                      Your Email
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input class="inputfild" type="email" name="email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>
                      Your Message
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <textarea class="inputfild" rows="8" name="textmess">
                    </textarea>
                  </div>
                </div>
                <button type="submit" class="pull-right">
                  Send Message
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix">
    </div>

  </div>
</div>
<div class="clearfix">
</div>
@stop
