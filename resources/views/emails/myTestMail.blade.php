<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Ticket</title>
    {{-- <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        width: 210mm;
        height: 297mm;
      }
      .ticket {
        border: 1px solid black;
        border-radius: 10px;
        box-sizing: border-box;
        width: 160mm;
        margin-top: 10mm;
        height: 60mm;
        background-color: red;
      }
      .imagee {
        float: left;
        width: 80mm;
        height: 60mm;
        background-color: black;
        text-align: center;
        border-radius: 10px 0 0 10px;
        border-right: solid 1px black;
      }
      .content {
        float: left;
        width: 80mm;
        height: 60mm;
        background-color: black;
        text-align: center;
        border-radius: 0 10px 10px 0;
      }
      .infos {
        color: white;
        margin-top: 0.5mm;
        margin-bottom: 1mm;
        font-size: 2.5mm;
        font-family: 'Courier New', Courier, monospace;
      }
      .title{
        font-family: 'Courier New', Courier, monospace;
        color: white;
        font-size: 7mm;
      }
      .event_image
      {
        width: 80mm;
        height:60mm;
        border-radius: 10px 0 0 10px;
      }
    </style> --}}
  </head>
  <body>
    {{-- <div>
      <div class='ticket'>
        <div class="imagee">
          <img class="event_image" src="https://wallpapercave.com/wp/wp2349395.jpg" alt=""> 
        </div>
        <div class="content">
          <div style='margin-top: 6mm;'>
            <div class="event-details">
              <div class="event-title">
                <div style="width: 80mm;align-text:center">
                   <img style="width:40mm;" src="https://i.ibb.co/Npc7dgx/Evanto.png" alt=""> 
                </div> --}}
                {{-- <span class="title">{{ $reservation->event->title }}</span> --}}
              {{-- </div>
            </div>
          </div>
          <div> --}}
            {{-- <h5 style="margin-top: 3mm;" class="infos">Name: {{ $reservation->user->name }}</h5>
            <h5 class="infos">UID: {{ $reservation->id }}</h5>
            <h5 class="infos">Location: {{ $reservation->event->location }}</h5>
            <h5 class="infos">Event start at: {{ $reservation->event->start_datetime }}</h5>
            <h5 class="infos">Event end at: {{ $reservation->event->end_datetime }}</h5>
            <h5 class="infos">Reserved In: {{ $reservation->created_at }}</h5> --}}
          {{-- </div>
        </div>
      </div>
    </div> --}}
    <div class="mx-auto bg-gray-700 h-screen flex items-center justify-center px-8" style="background-image: url('https://cdn1.vectorstock.com/i/1000x1000/79/30/events-background-with-maple-leaves-vector-10537930.jpg')">
      <div class="flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
          <div class="w-full h-64 bg-top bg-cover rounded-t" style="background-image: url({{ asset('uploads/events/' . $reservation->event->image) }})"></div>
          <div class="flex flex-col w-full md:flex-row">
              <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-gray-400 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                  <div class="flex items-center">
                      <span class="font-semibold w-24">Event start at:</span>
                      <span>{{ $reservation->event->start_datetime }}</span>
                  </div>
                  <div class="flex items-center">
                      <span class="font-semibold w-24">Event End at:</span>
                      <span>{{ $reservation->event->end_datetime }}</span>
                  </div>
              </div>
              <div class="p-4 font-normal text-gray-800 md:w-3/4">
                  <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">title : {{ $reservation->event->title }}</h1>
                  <p class="leading-normal">description : {{ $reservation->event->description }}</p>
                  <div class="flex flex-row items-center mt-4 text-gray-700">
                      <div class="w-1/2">
                          <p>location: </p>{{ $reservation->event->location }}
                      </div>
                  </div>
                  <div class="flex items-center">
                      <span class="font-semibold w-24">Type:</span>
                      <span>{{ $reservation->event->type }}</span>
                  </div>
                  <div class="flex items-center">
                      <span class="font-semibold w-24">Your Seat:</span>
                      <span>{{ $reservation->place }}</span>
                  </div>
              </div>
              <div class="w-1/3 flex justify-end">
                  <img src="https://www.printempsdunumerique.fr/wp-content/uploads/2016/09/code-barre-2d.jpg" alt="Event Logo" class="w-8">
              </div>
          </div>
      </div>
  </div>
  </body>
</html>
