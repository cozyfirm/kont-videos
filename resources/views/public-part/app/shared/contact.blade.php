<section class="contact @isset($contact) black-wrapper @endisset">
    <div class="contact-container">
        <div class="lable-content">
            <h1>Kontaktirajte nas</h1>
            <p>Čekamo vaša pitanja, sugestije, komentare...</p>
        </div>
        <div class="content-container">
            <div class="left-content">
                <div class="body">
                    <div class="header">
                        @isset($contact)
                            <img src="{{ asset('files/images/logo.svg') }}">
                        @else
                            <img src="{{ asset('files/images/logo-black.svg') }}">
                        @endisset
                    </div>
                    <div class="details">
                        <div class="el">
                            <h2>{{ __('Adresa') }}:</h2>
                            <p>Gabelina 14 </br> 71000 Sarajevo </br> BiH
                            </p>
                        </div>
                        <div class="el">
                            <h2>{{ __('Telefon') }}:</h2>
                            <p>+387 61 210 926
                            </p>
                        </div>
                        <div class="el">
                            <h2>{{ __('Mail') }}:</h2>
                            <p>info@kont.ba</p>
                        </div>
                    </div>
                    <p class="description">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat perspiciatis vero recusandae. Ea
                        aliquam deserunt, in rerum velit temporibus distinctio animi mollitia eligendi quibusdam quaerat,
                        cupiditate optio! Debitis distinctio nam nulla reprehenderit alias voluptatibus, aliquid ratione at
                        quidem, harum officia. Maxime soluta suscipit.
                    </p>
                </div>
            </div>

            <div class="right-content">
                <div class="textfield-outlined">
                    <input id="contact-us-name" type="text" placeholder="">
                    <label for="contact-us-name">{{ __('Ime') }}</label>
                </div>
                <div class="textfield-outlined">
                    <input id="contact-us-surname" type="text" placeholder="">
                    <label for="contact-us-surname">{{ __('Prezime') }}</label>
                </div>
                <div class="textfield-outlined">
                    <input id="contact-us-email" type="email" placeholder="">
                    <label for="contact-us-email">{{ __('Email') }}</label>
                </div>
                <div class="textfield-outlined">
                    <input id="contact-us-subject" type="text" placeholder="">
                    <label for="contact-us-subject">{{ __('Subject') }}</label>
                </div>
                <div class="textfield-outlined">
                    <textarea id="contact-us-message" cols="30" rows="10" placeholder=""></textarea>
                    <label for="contact-us-message">{{ __('Vaša poruka') }}</label>
                </div>
                <div class="Button-field">
                    <button class="btn-tertiary send-an-email">{{ __('Pošalji') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
