"use client"

import { motion } from "framer-motion"
import Image from "next/image"

const events = [
  { title: "Freshers Welcome", date: "September 1, 2023", image: "/freshers-welcome.jpg" },
  { title: "Annual Cultural Festival", date: "October 15-17, 2023", image: "/cultural-festival.jpg" },
  { title: "Tech Innovation Summit", date: "November 5, 2023", image: "/tech-summit.jpg" },
  { title: "Spring Sports Tournament", date: "March 10-15, 2024", image: "/sports-tournament.jpg" },
]

const CampusEvents = () => {
  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">Upcoming Campus Events</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        {events.map((event, index) => (
          <motion.div
            key={event.title}
            className="bg-white rounded-lg shadow-lg overflow-hidden"
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <Image
              src={event.image || "/placeholder.svg"}
              alt={event.title}
              width={300}
              height={200}
              className="w-full h-48 object-cover"
            />
            <div className="p-4">
              <h3 className="text-xl font-semibold mb-2">{event.title}</h3>
              <p className="text-gray-600">{event.date}</p>
            </div>
          </motion.div>
        ))}
      </div>
    </section>
  )
}

export default CampusEvents

