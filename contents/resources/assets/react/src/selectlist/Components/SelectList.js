import React, {useContext} from 'react';
import AppContext from '../contexts/AppContext';
import ListItem from './ListItem';
import {SUGGEST_ITEMS} from '../actions/lists.js';

const SelectList = () => {
    const { state, dispatch } = useContext(AppContext);

    const toggle = () => {
        const contents = document.querySelector('.list__contents');
        contents.style.display = contents.style.display === 'block' ? 'none' : 'block';
    }

    const suggest = e => {
        dispatch({
            type: SUGGEST_ITEMS,
            input: e.target.value
        })
    }

    return (
        <>
            <button type="button" className="list__btn" onClick={toggle}>
                <span className="list__btn--title">ユーザーを選択する</span>
                <b className="list__btn--triangle"></b>
            </button>
            <ul className="list__contents">
                <li>
                    <div className="list__contents--input-box">
                        <input className="list__contents--input" type="text" placeholder="Search" onChange={suggest} />
                    </div>
                </li>
                {
                    state.map(item => <ListItem key={item.id} item={item}/>)
                }
            </ul>
        </>
    )
}

export default SelectList
