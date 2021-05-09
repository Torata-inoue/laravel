import React, { useReducer, useState, useEffect } from 'react'
import reducer from '../../library/selectlist/reducers/lists.js';
import SelectList from '../../library/selectlist/components/SelectList';
import { Line } from 'react-chartjs-2';

import { DateRangePicker } from 'react-dates';

import 'moment/locale/ja';

import 'react-dates/lib/css/_datepicker.css';
import 'react-dates/initialize';

const App = ({users}) => {
    // ------------------- user list ---------------------------------------
    const [state, dispatch] = useReducer(reducer, users);
    const options = {
        isClose: false,
        isPull: true
    }
    const [chartData, setChartData] = useState();

    // ----------------------------------------------------------------------

    // ------------------ chart ---------------------------------------------
    const chart = {
        data: {
            labels: ['2021-02', '2021-03', '2021-04', '2021-05'],
            datasets: [
                {
                    label: 'comment',
                    data: [12, 19, 3, 5, 2, 3],
                    fill: false,
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgba(255, 99, 132, 0.2)',
                    yAxisID: 'y-axis-1',
                },
                {
                    label: 'login',
                    data: [23, 22, 19, 24, 18, 10],
                    fill: false,
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgba(54, 162, 235, 0.2)',
                    yAxisID: 'y-axis-2',
                },
                {
                    label: 'reaction',
                    data: [201, 154, 301, 153, 244, 190],
                    fill: false,
                    backgroundColor: 'rgb(0, 0, 0)',
                    borderColor: 'rgba(0, 0, 0, 0.2)',
                    yAxisID: 'y-axis-3',
                },
            ],
        },
        options: {}
    }

    // TODO useEffectでdatasetsを定義する
    useEffect(() => setChartData(chart.data), [])

    const changeChart = () => {
        chartData.datasets[0].data = [201, 154, 301, 153, 244, 190];
        chartData.datasets[1].data = [12, 19, 3, 5, 2, 3];
        chartData.datasets[2].data = [23, 22, 19, 24, 18, 10];
        setChartData(chartData);
    }

    // ----------------------------------------------------------------------

    // ----------------------- daterangepicker ------------------------------
    const [startDate, setStartDate] = useState(null);
    const [endDate, setEndDate] = useState(null);
    const [focusedInput, setFocusedInput] = useState(null);
    // ----------------------------------------------------------------------
    const setSelectedUser = a => console.log(a);
    return (
        <>
            <SelectList state={state} dispatch={dispatch} options={options} setSelectedUser={setSelectedUser}/>
            <br/>
            <button onClick={changeChart}>値を変更する</button>
            <div>
                <DateRangePicker
                    startDate={startDate}
                    startDateId="startDateId"
                    endDate={endDate}
                    endDateId="endDateId"
                    focusedInput={focusedInput}
                    onFocusChange={focused => setFocusedInput(focused)}
                    onDatesChange={(selectedDates) => {
                        console.log(selectedDates)
                        setStartDate(selectedDates.startDate);
                        setEndDate(selectedDates.endDate);
                    }}
                showClearDates={true}
                />
            </div>
            <Line data={chartData} options={chart.options} />
        </>
    )
}

export default App;
