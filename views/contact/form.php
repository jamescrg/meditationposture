

<form action="contact" method="post">

    <input type="hidden" name="submitted" value="1">

    <div class="form-group">
    <label class="contact" for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="form-group">
    <label class="contact" for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
    <label class="contact" for="subject">Subject</label>
    <input type="subject" class="form-control" id="subject" name="subject">
    </div>

    <div class="form-group">
    <label class="contact" for="body">Message</label>
    <textarea class="form-control" id="body" rows="5" name="body"></textarea>
    </div>

    <div class="form-group">
    <div class="g-recaptcha" data-sitekey="6LeKgegUAAAAACdnoYhcA1zTTQA546aqZfgREZBf"></div>
    </div>

    <button id="contactButton" type="submit" class="btn btn-primary mb-2">Submit</button>

</form>

<script src='https://www.google.com/recaptcha/api.js'></script>

