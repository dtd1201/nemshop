<?php

namespace App\Http\Controllers\Crater\Settings;

use App\Http\Controllers\Crater\Controller;
use App\Http\Requests\Crater\MailEnvironmentRequest;
use Crater\Mail\TestMail;
use App\Models\Crm\Setting;
use Crater\Space\EnvironmentManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mail;

class MailConfigurationController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected $environmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->environmentManager = $environmentManager;
    }

    /**
     *
     * @param MailEnvironmentRequest $request
     * @return JsonResponse
     */
    public function saveMailEnvironment(MailEnvironmentRequest $request)
    {

        $setting = Setting::getSetting('profile_complete');
        $results = $this->environmentManager->saveMailVariables($request);

        if ($setting !== 'COMPLETED') {
            Setting::setSetting('profile_complete', 4);
        }

        return redirect(route('sale.mailConfig'))->with('success', 'Contact updated!');
    }

    public function getMailEnvironment()
    {
        $mailDriver = [
            'smtp',
            'mail',
            'sendmail',
            'mailgun',
            'ses',
        ];
        $MailData = [
            'mail_driver' => config('mail.driver'),
            'config_driver' => $mailDriver,
            'mail_host' => config('mail.host'),
            'mail_port' => config('mail.port'),
            'mail_username' => config('mail.username'),
            'mail_password' => config('mail.password'),
            'mail_encryption' => config('mail.encryption'),
            'from_name' => config('mail.from.name'),
            'from_mail' => config('mail.from.address'),
            'mail_mailgun_endpoint' => config('services.mailgun.endpoint'),
            'mail_mailgun_domain' => config('services.mailgun.domain'),
            'mail_mailgun_secret' => config('services.mailgun.secret'),
            'mail_ses_key' => config('services.ses.key'),
            'mail_ses_secret' => config('services.ses.secret'),
        ];


        return view('admin.crater.settings.mail.index', $MailData);
    }

    /**
     *
     * @return JsonResponse
     */
    public function getMailDrivers()
    {
        $drivers = [
            'smtp',
            'mail',
            'sendmail',
            'mailgun',
            'ses',
        ];

        return response()->json($drivers);
    }

    public function testEmailConfig(Request $request)
    {
        $this->validate($request, [
            'to' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to($request->to)->send(new TestMail($request->subject, $request->message));

        return response()->json([
            'success' => true,
        ]);
    }
}
