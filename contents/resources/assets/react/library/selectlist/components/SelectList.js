import React from 'react';
import AppContext from '../contexts/AppContext.js';
import '../scss/list.scss';
import Lists from './Lists';

/**
 * @param state リストに表示するアイテムの配列の状態（state）
 * @param dispatch
 * @param options オプションのオブジェクト isPullとisClose
 * @param setSelectedUser 選択したアイテムの状態を変更するメソッド
 * @returns {JSX.Element}
 * @constructor
 */
const SelectList = ({state, dispatch, options, setSelectedUser}) => {
    const toggle = () => {
        const contents = document.querySelector('.list__contents');
        contents.style.display = contents.style.display === 'block' ? 'none' : 'block';
    }

    return (
        <AppContext.Provider value={{state, dispatch, options, setSelectedUser}}>
            <button type="button" className="list__btn" onClick={toggle}>
                <span className="list__btn--title">ユーザーを選択する</span>
                <b className="list__btn--triangle"></b>
            </button>
            <Lists />
        </AppContext.Provider>
    );
}

export default SelectList;
