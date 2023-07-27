import React from 'react'
import registerBg from '../assets/register.png'
import { Link } from 'react-router-dom';

const Register = () => {
  return (
    <>
      <div className="w-full h-[800px] flex items-center">
        <div className="h-full flex-1 flex justify-center items-center bg-pink-200 md:rounded-e-3xl">
          <div className="h-[620px] min-w-[400px] max-w-[600px]">
            <h3 className="text-center py-8 text-2xl font-bold">Register</h3>
            <div className="w-full px-[10%]">
              <form action="">
                <div className="w-full relative mt-4">
                  <label htmlFor="" className="absolute -top-6">
                    Full name
                  </label>
                  <input
                    type="text"
                    placeholder="Enter Your Full Name..."
                    className="w-full px-4 py-1 outline-none rounded-md"
                  />
                </div>
                <div className="w-full relative mt-8">
                  <label htmlFor="" className="absolute -top-6">
                    Email
                  </label>
                  <input
                    type="email"
                    placeholder="Enter Your Email..."
                    className="w-full px-4 py-1 outline-none rounded-md"
                  />
                </div>
                <div className="w-full relative mt-8">
                  <label htmlFor="" className="absolute -top-6">
                    Phone number
                  </label>
                  <input
                    type="number"
                    placeholder="Enter Your Phone Number..."
                    className="w-full px-4 py-1 outline-none rounded-md"
                  />
                </div>
                <div className="w-full relative mt-8">
                  <label htmlFor="" className="absolute -top-6">
                    User name
                  </label>
                  <input
                    type="text"
                    placeholder="Enter Your User Name..."
                    className="w-full px-4 py-1 outline-none rounded-md"
                  />
                </div>
                <div className="w-full relative mt-8">
                  <label htmlFor="" className="absolute -top-6">
                    Password
                  </label>
                  <input
                    type="password"
                    placeholder="Enter Your Password..."
                    className="w-full px-4 py-1 outline-none rounded-md"
                  />
                </div>
                <button className="my-10 w-full bg-teal-300 py-1 rounded-md">
                  Login
                </button>
              </form>
              <h3 className="text-center">
                You have an account?{" "}
                <span className="font-bold">
                  <Link to="/login">Login</Link>
                </span>
              </h3>
            </div>
          </div>
        </div>
        <div className="w-[600px] hidden md:block mr-[10%]">
          <img src={registerBg} alt="loginBg" />
        </div>
      </div>
    </>
  );
}

export default Register