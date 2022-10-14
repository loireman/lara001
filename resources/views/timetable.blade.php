<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"  >
                <div class="border-b border-gray-200" >
                    <h4 class="p-10 full-width font-semibold text-3xl leading-tight">
                        Timetable
                    </h4>
                    <?php
                    $week = ['first', 'second'];
                    ?>
                @foreach ($week as $week)
                        <span class="p-10 text-xl font-bold"> Week: {{ $week }}</span>
                    <div class="">
                        <?php
                        $days = [['Monday', 'Tuesday', 'Wednesday'], ['Thursday', 'Friday', 'Saturday']];
                        $times = [['8:00', '9:35'], ['9:50', '11:25'], ['11:40', '13:15'], ['13:30', '15:05'], ['15:20', '16:55'], ['17:10', '18:45']]
                        ?>
                        @foreach ($days as $days)
                            <div class="m-2 p-2" style="float:left; width: 48%;">
                            @foreach ($days as $days)
                                <div>
                                    <div class="p-2 w-48 h-10 bg-gray-300 text-center font-bold rounded-5">
                                    {{ $days }}
                                    </div><br/>
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="flex my-3">
                                        <div class="py-2.5 flex-col text-center w-64 font-bold" style="background-color: #7790A6;">
                                            @foreach ($content as $cont)
                                                @if ($cont->number == $i + 1 && $cont->day == $days && $cont->week == $week)
                                                    {{ $cont->subject }}<br/>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="py-2.5 mx-2.5 flex-col text-center h-12 w-14 font-bold bg-gray-300">
                                            {{ $times[$i][0] }}
                                        </div>
                                        <div class="py-2.5 flex-col text-center h-12 w-14 font-bold bg-gray-300">
                                            {{ $times[$i][1] }}
                                        </div>
                                        <br/>
                                    </div>
                                    @endfor
                                </div>
                                    <br/>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


