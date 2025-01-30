"use client"

import { motion } from "framer-motion"
import Image from "next/image"

const StudentLifeHero = () => {
  return (
    <div className="relative h-[60vh] flex items-center justify-center text-white overflow-hidden">
      <Image
        src="/student-life-hero.jpg"
        alt="Student Life"
        layout="fill"
        objectFit="cover"
        className="absolute inset-0 z-0"
      />
      <div className="absolute inset-0 bg-black opacity-50 z-10"></div>
      <motion.div
        className="relative z-20 text-center"
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
      >
        <h1 className="text-5xl md:text-6xl font-bold mb-4">Experience Student Life</h1>
        <p className="text-xl md:text-2xl max-w-2xl mx-auto">
          Discover a vibrant community, endless opportunities, and unforgettable experiences.
        </p>
      </motion.div>
    </div>
  )
}

export default StudentLifeHero

