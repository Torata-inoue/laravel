import React, {useContext, useEffect, useState} from 'react';
import AppContext from '../contexts/AppContext';

import 'bootstrap/dist/css/bootstrap.min.css';

import useEffectCustom from '../hooks/useEffectCustom';

const GroupBtn = () => {
    const { request } = useContext(AppContext);
    const [groupBy, setGroupBy] = useState('week');
    useEffectCustom(() => request(3), [groupBy]);

    return (
        <div className="btn-group mx-2">
            <button className="btn btn-secondary" type="button" onClick={() => setGroupBy('week')}>週</button>
            <button className="btn btn-secondary" type="button" onClick={() => setGroupBy('month')}>月</button>
        </div>
    )
}

export default GroupBtn;
