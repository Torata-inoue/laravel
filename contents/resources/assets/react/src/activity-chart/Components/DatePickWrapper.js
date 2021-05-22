import React, {useContext, useState} from 'react';
import AppContext from '../contexts/AppContext';

import DatePicker from 'react-datepicker';
import "react-datepicker/dist/react-datepicker.css";

import useEffectCustom from '../hooks/useEffectCustom';

const DatePickWrapper = () => {
    const { request } = useContext(AppContext);
    const date = new Date();
    const [startDate, setStartDate] = useState(new Date(date.getFullYear(), date.getMonth() - 1));
    const [endDate, setEndDate] = useState(new Date());

    useEffectCustom(() => request(2), [startDate]);
    useEffectCustom(request, [endDate]);

    return (
        <>
            <DatePicker
                selected={startDate}
                onChange={date => setStartDate(date)}
                selectsStart
                startDate={startDate}
                endDate={endDate}
                dateFormat="yyyy/MM"
                showMonthYearPicker
                className="form-control border-secondary"
            />
            <DatePicker
                selected={endDate}
                onChange={date => setEndDate(date)}
                selectsEnd
                startDate={startDate}
                endDate={endDate}
                dateFormat="yyyy/MM"
                showMonthYearPicker
                className="form-control border-secondary"
            />
        </>
    )
};

export default DatePickWrapper;
