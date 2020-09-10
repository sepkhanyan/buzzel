@lang('strings.emails.demo.email_body_title')

@lang('validation.attributes.frontend.first_name'): {{ $request->first_name }}
@lang('validation.attributes.frontend.last_name'): {{ $request->last_name }}
@lang('validation.attributes.frontend.email'): {{ $request->email }}
@lang('validation.attributes.frontend.phone'): {{ $request->phone ?? 'N/A' }}

