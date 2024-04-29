<?php build('content') ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Chatbot Ask Anything</h4>
        </div>
        <div class="card-body">
            <iframe
                src="https://www.chatbase.co/chatbot-iframe/mXAR2M1vlgboQjT2b5ON6"
                title="Chatbot"
                width="100%"
                style="height: 100%; min-height: 700px"
                frameborder="0"
            ></iframe>
        </div>
    </div>
<?php endbuild()?>
<?php loadTo($viewType == 'auth' ? 'tmp/backend' : 'tmp/public')?>