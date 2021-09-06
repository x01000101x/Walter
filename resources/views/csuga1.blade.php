                                <div class="table-responsive">
                                    <table class="table tablesorter " id="">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    NO
                                                </th>
                                                <th>
                                                    Percentage
                                                </th>
                                                <th class="text-center">
                                                    Time
                                                </th>
                                                <th class="text-center">
                                                    Day
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach ($datas as $key=>$data)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{$loop->iteration}} {{-- 1, 2, 3, ++ --}}
                                                </td>
                                                <td>
                                                    {{$data['value']}}%
                                                </td>
                                                <td class="text-center">
                                                    {{$data['created_at']}}
                                                </td>
                                                <td class="text-center">
                                                    Day {{$key+1}}
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
