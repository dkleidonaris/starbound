<x-mail::message>
# New Contact Message

There was a new contact message submitted through the StarBound
website. Read it's contents below:

**Name:** {{ $message->name }}<br>
**Email:** {{ $message->email }}<br>
**Message:**<br>
{{ $message->message }}

Thanks,<br>
StarBound Website
</x-mail::message>
