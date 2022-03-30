<style>
  .footer-dark {
    padding: 50px 0;
    color: #f0f9ff;
    background-color: rgb(33, 125, 187);
    /* background-color: #282d32; */
    margin-top: 50px;
  }

  .footer-dark h3 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
  }

  .footer-dark ul {
    padding: 0;
    list-style: none;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
  }

  .footer-dark ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.6;
  }

  .footer-dark ul a:hover {
    opacity: 0.8;
  }

  @media (max-width:767px) {
    .footer-dark .item:not(.social) {
      text-align: center;
      padding-bottom: 20px;
    }
  }

  .footer-dark .item.text {
    margin-bottom: 36px;
  }

  @media (max-width:767px) {
    .footer-dark .item.text {
      margin-bottom: 0;
    }
  }

  .footer-dark .item.text p {
    opacity: 0.6;
    margin-bottom: 0;
  }

  .footer-dark .item.social {
    text-align: center;
  }

  @media (max-width:991px) {
    .footer-dark .item.social {
      text-align: center;
      margin-top: 20px;
    }
  }

  .footer-dark .item.social>a {
    font-size: 20px;
    width: 36px;
    height: 36px;
    line-height: 36px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.4);
    margin: 0 8px;
    color: #fff;
    opacity: 0.75;
  }

  .footer-dark .item.social>a:hover {
    opacity: 0.9;
  }

  .footer-dark .copyright {
    text-align: center;
    padding-top: 24px;
    opacity: 0.3;
    font-size: 13px;
    margin-bottom: 0;
  }
</style>

<div class="footer-dark">
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 item">
          <h3>Services</h3>
          <ul>
            <li><a href="/jobs">View Jobs</a></li>
            {{-- <li><a href="/company/dashboard?tab=create-job">Create Job</a></li> --}}
            <li><a href="#">Products</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3 item">
          <h3>About</h3>
          <ul>
            <li><a href="/about">Team</a></li>
            <li><a href="mailto:joblister@gmail.com">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-6 item text">
          <h3>{{ config('app.name', 'JobLister') }}</h3>
          <p>Job listing portal where candidates can easily search jobs, apply, and manage applied applications. 
            Companies can organization can create job posts, manage candidate applications.</p>
        </div>
        <div class="col item social">
          <a href="https://github.com/roshan9419"><i class="bi bi-github"></i></a>
          <a href="https://www.linkedin.com/in/roshank9419/"><i class="bi bi-linkedin"></i></a>
          <a href="https://twitter.com/RoshanK70963497"><i class="bi bi-twitter"></i></a>
        </div>
      </div>
      <p class="copyright">{{ config('app.name', 'JobLister') }} © 2022</p>
    </div>
  </footer>
</div>