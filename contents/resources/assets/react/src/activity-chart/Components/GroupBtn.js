import React, {useContext, useEffect, useState} from 'react';
import AppContext from '../contexts/AppContext';

import useEffectCustom from '../hooks/useEffectCustom';

const GroupBtn = () => {
    const { request } = useContext(AppContext);
    const [groupBy, setGroupBy] = useState('week');
    useEffectCustom(() => request(3), [groupBy]);

    return (
        <>
            <button type="button" onClick={() => setGroupBy('week')}>週</button>
            <button type="button" onClick={() => setGroupBy('month')}>月</button>
        </>
    )
}

export default GroupBtn;
