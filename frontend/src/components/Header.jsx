import React, { useState } from 'react'
import { Link } from 'react-router-dom'
import { FaBars } from "react-icons/fa6"
import { BsSearch } from "react-icons/bs"
import { CgClose } from 'react-icons/cg'
import logo from '../assets/logo.png'

const Header = () => {

    const[showBar, setShowBar] = useState(false)

  return (
    <header className="bg-pink-200 h-20">
      <nav className="w-full h-full px-[5%] flex items-center justify-between">
        <div className="relative w-[10%] h-full">
          <Link to="/" className="w-20 absolute">
            <img src={logo} alt="logo" />
          </Link>
        </div>
        <div className="flex w-[10%] justify-between md:hidden">
          <button>
            <BsSearch size={20} />
          </button>
          <button onClick={() => setShowBar(!showBar)}>
            {showBar ? <CgClose size={20} /> : <FaBars size={20} />}
          </button>
        </div>
        <div
          className={`absolute left-0 bg-pink-200 w-full h-52 flex flex-col items-center md:relative md:flex-row md:h-20 md:top-0 duration-500 ${
            showBar ? "top-20" : "-top-56"
          }`}
        >
          <div className="w-[80%] md:w-[50%] h-8 flex">
            <input
              type="search"
              placeholder="Search..."
              className="w-full pl-6 rounded-s-md outline-none"
            />
            <button className="w-10 bg-white rounded-e-md border-l flex justify-center items-center">
              <BsSearch size={18} />
            </button>
          </div>
          <ul className="pt-3 md:pt-0 md:w-[30%] md:flex flex-row justify-around">
            <li className="m-2 w-32">
              <Link to="/sale-product">Sell Product</Link>
            </li>
            <li className="m-2 w-32">
              <Link to="/buy-product">Buy Product</Link>
            </li>
          </ul>
          <ul className="flex w-[80%] md:w-[20%] pt-8 md:pt-0 justify-around">
            <li className="bg-teal-300 w-32 py-1 rounded-md text-center">
              <Link to="/login">Login</Link>
            </li>
            <li className="bg-teal-300 w-32 py-1 rounded-md text-center">
              <Link to='/register'>Register</Link>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  );
}

export default Header