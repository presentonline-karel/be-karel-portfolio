<?php
return function ($kirby, $pages, $page, $site) {
    $alert = null;

    if ($kirby->request()->is('POST') && get('submit')) {

        // check honeypot
        if (empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        // data from contact form
        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'subject' => get('subject'),
            'message'  => get('message')
        ];

        // the data is invalid
        if ($invalid = invalid($data)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                // set email function with correct values
                $kirby->email([
                    'template' => 'email',
                    'from'     => 'contact@presentonline.be',
                    'replyTo'  => $data['email'],
                    'to'       => esc($site->email()),
                    'subject'  => esc($data['name']) . ' - STARTER KIT - contactformulier',
                    'data'     => [
                        'name'   => esc($data['name']),
                        'email' => esc($data['email']),
                        'subject' => esc($data['subject']),
                        'message' => esc($data['message'])
                    ]
                ]);

                // when an exception error occured
            } catch (Exception $error) {
                if (option('debug')) :
                    $alert['error'] = 'Het formulier kon niet verzonden worden: <strong>' . $error->getMessage() . '</strong>';
                else :
                    $alert['error'] = 'Het formulier kon niet verzonden worden.';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = 'Je boodschap is goed aangekomen! Je hoort snel van ons terug.';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};