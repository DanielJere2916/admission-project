"use client"

import { useState, useEffect } from "react"
import { motion } from "framer-motion"

const Hero = () => {
  const [currentWord, setCurrentWord] = useState(0)
  const words = ["Courage", "Excellence", "Confidence"]

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentWord((prev) => (prev + 1) % words.length)
    }, 3000)
    return () => clearInterval(interval)
  }, [])

  return (
    <div className="relative h-screen flex items-center justify-center text-white">
      <div className="absolute inset-0 bg-black opacity-50 z-0"></div>
      <div className="absolute inset-0 bg-cover bg-center z-0" style={{ backgroundImage: "url('/campus.jpg')" }}></div>
      <div className="relative z-10 text-center">
        <motion.h1
          className="text-5xl font-bold mb-4"
          initial={{ opacity: 0, y: -50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          <span className="block">{words[currentWord]}</span>
        </motion.h1>
        <motion.p
          className="text-xl mb-8"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5, delay: 0.2 }}
        >
          Start Your Journey at Malawi's Premier University
        </motion.p>
        <motion.div
          className="space-x-4"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.5, delay: 0.4 }}
        >
          <button className="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
            Apply Now
          </button>
          <button className="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
            Explore Programmes
          </button>
        </motion.div>
      </div>
    </div>
  )
}

export default Hero

